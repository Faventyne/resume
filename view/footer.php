        <footer>
            <div class="mx-auto" style="width: 300px;">
                <a href=" <?= $lePage->facebook->shareUrl ?>">Facebook</a> / <a href=" <?= $lePage->twitter->shareUrl ?>">Twitter</a> / <a href=" <?= $lePage->linkedin->shareUrl ?>">LinkedIn</a>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var session_id = '<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : 0 ?>';
        </script>
        <script type="text/javascript" src="../public/js/script.js"></script>

        </script>
    </body>
</html>
