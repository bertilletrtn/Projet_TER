<header>
    <a href="site.php" class="logo">Join and Enjoy</a>

    <?php
    $menu = "<ul class='bar'>";
    if(isset($_SESSION['Num_Tel'])) {
        $menu .= "<li><a href='formulaireannonce.html'>Poster</a></li>";
    }
   // echo $menu . "<li><a href='../Compte/Compte.php' class='btn-compte'>" . isset($_SESSION['Num_Tel']) ? $_SESSION['Num_Tel'] : "Compte" . "</a></li></ul>";
    echo $menu . "<li><a href='../Compte/Compte.php' class='btn-compte'>Compte</a></li></ul>";
    ?>
</header>