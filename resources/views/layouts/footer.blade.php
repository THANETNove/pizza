    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <img id="img1" width="100%">
            </div>
        </div>
    </div>


    <script>
        var dateFormat = "yy-mm-dd";

        var from = $("#start_date").datepicker({
            dateFormat: dateFormat,
            changeMonth: true,
            changeYear: true,
            yearRange: "c-100:c+10",
            dayNames: [
                "อาทิตย์",
                "จันทร์",
                "อังคาร",
                "พุธ",
                "พฤหัสบดี",
                "ศุกร์",
                "เสาร์",
            ],
            dayNamesMin: ["อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."],
            monthNames: [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม",
            ],
            monthNamesShort: [
                "ม.ค.",
                "ก.พ.",
                "มี.ค.",
                "เม.ย.",
                "พ.ค.",
                "มิ.ย.",
                "ก.ค.",
                "ส.ค.",
                "ก.ย.",
                "ต.ค.",
                "พ.ย.",
                "ธ.ค.",
            ],
        });

        $("#end_date").datepicker({
            dateFormat: dateFormat,
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            dayNames: [
                "อาทิตย์",
                "จันทร์",
                "อังคาร",
                "พุธ",
                "พฤหัสบดี",
                "ศุกร์",
                "เสาร์",
            ],
            dayNamesMin: ["อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."],
            monthNames: [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม",
            ],
            monthNamesShort: [
                "ม.ค.",
                "ก.พ.",
                "มี.ค.",
                "เม.ย.",
                "พ.ค.",
                "มิ.ย.",
                "ก.ค.",
                "ส.ค.",
                "ก.ย.",
                "ต.ค.",
                "พ.ย.",
                "ธ.ค.",
            ],
            beforeShowDay: function(date) {
                var startDate = $("#start_date").val();
                if (startDate) {
                    var startDateObj = new Date(startDate);
                    var currentDate = new Date(date);
                    if (currentDate <= startDateObj) {
                        return [false, ""];
                    }
                }
                return [true, ""];
            },
        });


        function showImage(element, i) {
            event.stopPropagation();
            var modal = document.getElementById('myModal');
            var img = document.getElementById('myImg' + i).src;
            console.log("img", img);
            document.getElementById('img1').src = img;
        }


        $(document).ready(function() {
            $('.topping-select').change(function() {

                // Get the selected topping price
                var selectedToppingPrice = parseFloat($(this).find(':selected').data('topping-price')) || 0;

                // Get the pizza price
                var pizzaPrice = parseFloat($(this).data('pi-price')) || 0;

                // Calculate and update the total price
                var totalPrice = pizzaPrice + selectedToppingPrice;

                console.log("totalPrice", totalPrice);
                $(this).closest('.card-body').find('.total-price').text('$' + totalPrice.toFixed(2));
            });
        });

        /*  $('.cards-container').on('click', '.card-body', function() {
             var price = $(this).find('.price').text().replace(/\s/g, '').replace(/\$/g, '');
             var name_pi = $(this).find('.name_pi').text().replace(/\s/g, '');
             var topping = $(this).find('.topping').text().replace(/\s/g, '');
             var quantity = $(this).find('.quantity').val();

             // Call addToCart function with the extracted data
             addToCart(name_pi, price, topping, quantity);


         }); */

        function addToCart(clickedElement) {
            var cardBody = clickedElement.closest('.card-body');

            // Find the closest .card-body to the clicked element
            var price = cardBody.find('.price').text().replace(/\s/g, '').replace(/\$/g, '');
            var name_pi = cardBody.find('.name_pi').text().replace(/\s/g, '');
            var topping = cardBody.find('.topping').text().replace(/\s/g, '');
            var quantity = cardBody.find('.quantity').val();

            // Log the extracted data to the console
            console.log('Price:', price);
            console.log('Name:', name_pi);
            console.log('Topping:', topping);
            console.log('Quantity:', quantity);
        }
    </script>


    <script src="{{ URL::asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('/assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('/assets/js/demo/datatables-demo.js') }}"></script>
