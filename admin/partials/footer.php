

<footer>
        <section>
            <div class="custom-footer">
                <div class="address-text">
                   
                    <a href="http://localhost/food-order/" title="Logo">
                    <img src="http://localhost/food-order/images/footer-logo.png" alt="Restaurant Logo" class="footer-logo-responsive">
                </a>
                    <p> Holding 190, Road 5, Block J</p>
                    <p>Baridhara, Maddha,</p>
                    <p>Naya Nagar Rd, Dhaka 1212</p>
                </div>
                <div class="company-socal-links">
                    <div class="social-links">
                        <p><b><a href="https://www.facebook.com/" target="_blank" class="socail-link"><i
                                        class="fa-brands fa-facebook"></i></a></b></p>
                        <p><b><a href="https://www.linkedin.com/" target="_blank" class="socail-link"><i
                                        class="fa-brands fa-linkedin"></i></a></b></p>
                        <p><b><a href="https://www.youtube.com/" target="_blank" class="socail-link"><i
                                        class="fa-brands fa-youtube"></i></a></b></p>
                        <p><b><a href="https://www.instagram.com/" target="_blank" class="socail-link"><i
                                        class="fa-brands fa-instagram"></i></a></b></p>
                    
                    
                    </div>
                </div>
                <div class="container  copy-right-text">
                    <p>©<span id="year"></span> All rights reserved. Designed and Developed By , <a href="https://www.facebook.com/eh.emon3059/" style="text-decoration:none;" target="_blank"> E.h.Emon </a> </p>
                </div>
            </div>
        </section>
    </footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
</body>


</html>
<script>




document.getElementById("year").innerHTML = new Date().getFullYear();

    $(document).ready(function() {
        $('#myTable').DataTable();
       // $('#year').html = new Date().getFullYear();
    
    });
    



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