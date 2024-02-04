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


        var pizza = [];

        function addToCart(clickedElement) {
            var cardBody = clickedElement.closest('.card-body');

            // Find the closest .card-body to the clicked element
            var price = cardBody.find('.price').text().replace(/\s/g, '').replace(/\$/g, '');
            var name_pi = cardBody.find('.name_pi').text().replace(/\s/g, '');
            var topping = cardBody.find('.topping').val();
            var quantity = cardBody.find('.quantity').val();
            var img = cardBody.find('.img-id').val();


            if (!topping) {
                alert('กรุณาเลือก Topping!');
            } else {
                var existingPizza = pizza.find(item => item.name_pi === name_pi);
                var toppingPizza = pizza.find(item => item.topping === topping);

                if (existingPizza && toppingPizza) {
                    // If the pizza already exists, update its quantity
                    existingPizza.quantity = parseInt(existingPizza.quantity) + parseInt(quantity);
                    existingPizza.totalPrice = (parseFloat(existingPizza.price) * existingPizza.quantity);
                } else {
                    // If the pizza doesn't exist, create a new dataObject
                    var dataObject = {
                        image: img,
                        price: price,
                        name_pi: name_pi,
                        topping: topping,
                        quantity: quantity,
                        totalPrice: (parseFloat(price) * parseInt(quantity))
                    };

                    // Push the dataObject into the pizza array
                    pizza.push(dataObject);
                }

                var pizzaAllDiv = document.getElementById('pizza-all');
                pizzaAllDiv.innerHTML = '';
                var baseUrl = "{{ asset('/assets/img/pizza/') }}";
                pizza.forEach(function(item, index) {
                    var imageUrl = baseUrl + '/' + item.image;
                    var formattedPrice = parseFloat(item.price).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                    var formattedTotalPrice = parseFloat(item.totalPrice).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });



                    // Create elements dynamically using template literals
                    var div_pizza = `
                    <div class="dropdown-item d-flex align-items-center cursor" onclick="destroyPizza(${index})">
                        <div class="mr-3">
                            <img src="${imageUrl}" height="40px" width="40px" alt="...">
                        </div>
                        <div>
                            <div class="small text-gray-500">Order : ${++index}</div>
                            ${item.name_pi}  ${item.topping} จำนวน :${item.quantity}  ราคา : ${formattedPrice} สรุป :  ${formattedTotalPrice}
                            <br>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                    </div>`;

                    // Append the dynamically generated HTML to the 'pizza-all' div
                    pizzaAllDiv.innerHTML += div_pizza;
                });




                document.getElementById('counter').textContent = pizza.length;
                var pizzaAllDiv = document.getElementById('buy-all');
                pizzaAllDiv.innerHTML =
                    `<a class="dropdown-item text-center small text-gray-500 cursor" onclick="buyAll()">Buy All</a>`;

            }

        }



        function destroyPizza(index) {
            console.log("index", index);
            var indexToRemove = index; // Replace with the actual index you want to remove

            pizza.splice(indexToRemove, 1);

            var pizzaAllDiv = document.getElementById('pizza-all');
            pizzaAllDiv.innerHTML = '';
            var baseUrl = "{{ asset('/assets/img/pizza/') }}";
            pizza.forEach(function(item, index) {
                var imageUrl = baseUrl + '/' + item.image;
                var formattedPrice = parseFloat(item.price).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                var formattedTotalPrice = parseFloat(item.totalPrice).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });



                // Create elements dynamically using template literals
                var div_pizza = `
                    <div class="dropdown-item d-flex align-items-center cursor" onclick="destroyPizza(${index})">
                        <div class="mr-3">
                            <img src="${imageUrl}" height="40px" width="40px" alt="...">
                        </div>
                        <div>
                            <div class="small text-gray-500">Order : ${++index}</div>
                            ${item.name_pi}  ${item.topping} จำนวน :${item.quantity}  ราคา : ${formattedPrice} สรุป :  ${formattedTotalPrice}
                            <br>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                    </div>`;

                // Append the dynamically generated HTML to the 'pizza-all' div
                pizzaAllDiv.innerHTML += div_pizza;
            });

            document.getElementById('counter').textContent = pizza.length;

        }

        function addBuy(clickedElement) {

            var cardBody = clickedElement.closest('.card-body');

            // Find the closest .card-body to the clicked element
            var price = cardBody.find('.price').text().replace(/\s/g, '').replace(/\$/g, '');
            var name_pi = cardBody.find('.name_pi').text().replace(/\s/g, '');
            var topping = cardBody.find('.topping').val();
            var quantity = cardBody.find('.quantity').val();
            var img = cardBody.find('.img-id').val();

            var dataObject = {
                image: img,
                price: price,
                name_pi: name_pi,
                topping: topping,
                quantity: quantity,
                totalPrice: (parseFloat(price) * parseInt(quantity))
            };
            pizza.push(dataObject);

            this.buyAll();
        }


        function buyAll() {
            $.ajax({
                url: "/order-store", // Replace with your actual API endpoint
                type: "POST",
                data: {
                    data: pizza
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, // Your data payload
                success: function(response) {
                    console.log("Success:", response);

                    var pizzaAllDiv = document.getElementById('pizza-all');
                    pizzaAllDiv.innerHTML = '';
                    document.getElementById('counter').textContent = '';
                    alert('ซื้อสำเร็จ');
                    // Handle the success response here
                },
                error: function(error) {
                    console.error("Error:", error);
                    // Handle the error response here
                }
            });

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
