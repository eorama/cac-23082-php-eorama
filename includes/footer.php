<div class="footer">
        <div class="copyright">
            <p>Copyright © 2023 Eliézer. Hecho con <i class="fa-solid fa-heart"></i> por Eliézer Orama</p>
        </div>
    </div>
    <script>
        let tablinks = document.getElementsByClassName("tab-links");
        let tabcontents = document.getElementsByClassName("tab-contenido");

    function opentab(tabname){
        for(tablinks of tablinks){
            tablinks.classList.remove("link-activo");
        }
        for(tabcontents of tabcontents){
            tabcontents.classList.remove("tab-activo");
        }
        event.currentTarget.classList.add("link-activo");
        document.getElementById(tabname).classList.add("tab-activo");
    }
    </script>

    <script>
        let sidemenu = document.getElementById("sidemenu");
  
            function openmenu() {
                sidemenu.style.right = "0";
            }

            function closemenu() {
                sidemenu.style.right = "-300px";
            }
    </script>
</body>
</html>