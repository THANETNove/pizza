    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <img id="img1" width="100%">
            </div>
        </div>
    </div>
    <script>
        function showImage(element, i) {
            var modal = document.getElementById('myModal');
            var img = document.getElementById('myImg' + i).src;
            console.log("img", img);
            document.getElementById('img1').src = img;
        }
    </script>

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
