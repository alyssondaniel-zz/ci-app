<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col">
            <h2 class="title">Nova venda</h2>

            <?php
            if($this->session->flashdata('message'))
            {
                echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
            }
            ?>

            <form>
                <span id="successMessage"></span>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label">Produto</label>
                        <select class="form-control" id="product_id" name="product_id">
                            <option value="">Selecione um produto</option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?=$product->id?>"><?=$product->description?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger" id="productIdError"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="label">Forma de pagamento</label>
                        <select class="form-control" id="payment_method" name="payment_method">
                            <option value="" value="">Selecione a forma de pagamento</option>
                            <option value="cash">Dinheiro</option>
                            <option value="card">Cartão</option>
                            <option value="overdraft">Cheque</option>
                            <option value="billet">Boleto</option>
                        </select>
                        <span class="text-danger" id="paymentMethodError"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label">Cliente</label>
                        <select class="form-control" id="customer_id" name="customer_id">
                            <option value="">Selecione um cliente</option>
                            <?php foreach ($customers as $customer): ?>
                                <option value="<?=$customer->id?>"><?=$customer->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger" id="customerIdError"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="label">Quantidade</label>
                        <input id="quantity" name="quantity" class="form-control" type="number" placeholder="Digite a quantidade" aria-describedby="quantityHelp" value="<?php echo set_value('quantity') || 1; ?>">
                        <span class="text-danger" id="quantityError"></span>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="label">Valor</label>
                        <input id="amount" name="amount" class="form-control input-amount text-right" type="text" aria-describedby="amountHelp" value="0" readonly>
                        <span class="text-danger" id="amountError"></span>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" id="saleBtn">Realizar a venda</button>
            </form>
            <br />
            <a href="<?= base_url('dashboard')?>">Voltar</a>
        </div>
    </div>
</main>
<script>
new Cleave('.input-amount', {
    numeral: true,
    numeralDecimalMark: '.',
    delimiter: ''
});

$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();

        var product_id = $("#product_id option:selected").val()
        , customer_id = $("#customer_id option:selected").val()
        , payment_method = $("input[name='payment_method']").val()
        , amount = $("input[name='amount']").val()
        , quantity = $("input[name='quantity']").val()
        , _this = this;

        $.ajax({
            url: '<?= base_url("/sales/create")?>',
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#saleBtn').attr('disabled', true);
                $('#saleBtn').html('Realizando a venda..');
            },
            complete: function() {
                $('#saleBtn').attr('disabled', false);
                $('#saleBtn').html('Realizar a venda');
            },
            success: function(data){
                // console.log(data);
                if (data.error) {
                    if (data.product_id.length) {
                        $('#productIdError').html(data.product_id);
                    } else {
                        $('#productIdError').html('');
                    }
                    if (data.customer_id.length) {
                        $('#customerIdError').html(data.customer_id);
                    } else {
                        $('#customerIdError').html('');
                    }
                    if (data.payment_method.length) {
                        $('#paymentMethodError').html(data.payment_method);
                    } else {
                        $('#paymentMethodError').html('');
                    }
                    if (data.quantity.length) {
                        $('#quantityError').html(data.quantity);
                    } else {
                        $('#quantityError').html('');
                    }
                    if (data.amount.length) {
                        $('#amountError').html(data.amount);
                    } else {
                        $('#amountError').html('');
                    }
                } else {
                    if (data.success) {
                        $(_this).trigger("reset");
                        $('#successMessage').html(data.success);
                        $('#name_error').html('');
                    }
                }
            }
        });
    });


    // get value by productId
    $('select#product_id, select#payment_method').change(function(){
        amount();
    })

    $('#quantity').keypress( function(){
        amount();
    });

    function amount() {
        var productId = $('select#product_id').val();

        if (productId.length) {
            $.ajax({
                url: '<?= base_url("/products/get_amount_by_id/'+productId+'")?>',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if (data.error) {
                        $('#productIdError').html(data.message);
                    } else {
                        $('#productIdError').html('');
                        if (data.success) {
                            var paymentMethod = $('select#payment_method option:selected').val()
                            , quantity = parseFloat($('#quantity').val())
                            , amount = 0;

                            if (paymentMethod.length) {
                                if (paymentMethod == 'cash') {
                                    var cashPrice = parseFloat(data.success.cash_price);
                                    amount = cashPrice * quantity
                                } else {
                                    var forwardPrice = parseFloat(data.success.forward_price);
                                    amount = forwardPrice * quantity
                                }
                            }

                            $('#amount').val(amount.toFixed(2));
                        }
                    }
                }
            });
        }
    }

});

</script>
