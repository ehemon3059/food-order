<!-- Footer Section Starts -->
<div class="footer">
    <div class="wrapper">
        <p class="text-center">©<span id="year"> </span> All rights reserved, Food House. Developed By - <a href="#">Emon,Nazmul,sohel,Ibrahim Hossain</a></p>
    </div>
</div>
<!-- Footer Section Ends -->

</body>

</html>
<script>

    document.getElementById('year').innerHTML = new Date().getFullYear();

    $(document).ready(function() {
        var table = $('#example').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });


        
    });
</script>