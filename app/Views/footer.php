<footer class="bg-light fixed-bottom py-3">
    <div class="container">
        <p class="text-center text-muted">Tarr Imre - <a href="https://github.com/TarrImre" style="text-decoration:none" class="textpurple" target="_blank">Github</a></p>
    </div>
</footer>
<script>
    function hideField() {
        if (document.getElementById("field1").value.length > 0) {
            document.getElementById("button2").style.visibility = "hidden";
            document.getElementById("field2").disabled = true;
        } else {
            document.getElementById("button2").style.visibility = "visible";
            document.getElementById("field2").disabled = false;
        }

        if (document.getElementById("field2").value.length > 0) {
            document.getElementById("button1").style.visibility = "hidden";
            document.getElementById("field1").disabled = true;
        } else {
            document.getElementById("button1").style.visibility = "visible";
            document.getElementById("field1").disabled = false;
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>