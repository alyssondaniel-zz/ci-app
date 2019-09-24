<!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <!-- <script src="../../assets/js/vendor/popper.min.js"></script> -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/cleave.min.js"></script>

    <!-- Ícones -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
        new Cleave('.input-forward-price', {
            // prefix: 'R$',
            numeral: true,
            numeralDecimalMark: '.',
            delimiter: ''
        });

        new Cleave('.input-cash-price', {
            // prefix: 'R$',
            numeral: true,
            numeralDecimalMark: '.',
            delimiter: ''
        });

        new Cleave('.input-barcode', {
            numeral: true,
            delimiter: ''
        });
    </script>

  </body>
</html>
