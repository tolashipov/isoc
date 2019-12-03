    </div>
    <?php
        $t = time();
        for($i=0;$i<count($this->js);$i++) {
          echo "<script src='/isoc/js/{$this->js[$i]}?i={$t}'></script>";
        }
    ?>
  </body>
</html>