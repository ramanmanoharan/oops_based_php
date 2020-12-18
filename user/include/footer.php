<footer style="bottom:0;position:relative;background-color:transparent;color:white;padding:10px" class="header" ><center class="test">ONLINE GAS BOOKING SYSTEM | POWERED BY <a href="redbackstudios.in">REDBACK</a></center></footer>    
        </div>
    </div>
    <style type="text/css">
        .test {
  position: relative;
  padding-top:30px;
}
.test:after {
  content: "";
  display: inline-block;
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: -1; /* Place the pseudo element right under the content */
  top: 0;
  left: 0;
  background-image: -webkit-linear-gradient(92deg, #f35626, #feab3a);
  background: linear-gradient(to top, #f35626 50%, transparent 50%);
  animation-name: highlight;
  animation-duration: 0.75s;
  animation-iteration-count: infinite;
  animation-direction: alternate; /* Make the animation run back and forth */
}

@keyframes highlight {
  0% {
    width: 0;
    opacity: 0;
  }

  50% {
    width: 100%;
    opacity: 1;
  }
  from {
    -webkit-filter: hue-rotate(0deg);
  }
  to {
    -webkit-filter: hue-rotate(-360deg);
  }

}
    </style>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>