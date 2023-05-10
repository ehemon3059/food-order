<!-- social Section Starts Here -->
<section class="social">
    <div class="container text-center">
        <ul>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
            </li>
        </ul>
    </div>
</section>
<!-- social Section Ends Here -->

<!-- footer Section Starts Here -->
<section class="footer">
    <div class="container text-center">
        <p>©<span id="year"></span> All rights reserved. Designed By <a href="#">Emon,Nazmul,sohel,Ibrahim Hossain</a></p>
    </div>
</section>
<!-- footer Section Ends Here -->

</body>


</html>
<script>




document.getElementById("year").innerHTML = new Date().getFullYear();

    $(document).ready(function() {
        $('#myTable').DataTable();
       // $('#year').html = new Date().getFullYear();
    
    });
    
</script>