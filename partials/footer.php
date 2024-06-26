 <!--Footer-->
 <footer>
        <div class="footer__socials">
            <a href="https://youtube.com" target="_blank"><i class="uil uil-youtube"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram-alt"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                 <!--Categories-->
                 <h4>Categories</h4>
            <?php
                $all_categories_query = "SELECT * FROM categories";
                $all_categories = mysqli_query($connection, $all_categories_query);
            ?>
            <?php while($category = mysqli_fetch_assoc($all_categories)) :  ?>
                <ul>
                    <li>
                    <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id']?>"><?= $category['title']?></a>
                </li>
                </ul>
                
            
            <?php endwhile?>
                
               
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="contact.php">Online Support</a></li>
                    <li><a href="tel:+255748687340">Call Numbers</a></li>
                    <li><a href="mailto:jonaskiwia1@gmail.com">Emails</a></li>
                    <li><a href="contact.php">Social Support</a></li>
                </ul>  
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">Popular</a></li>
                    <li><a href="">Categories</a></li>
                </ul>  
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>  
            </article>
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; 2022 JONAS KIWIA</small>
        </div>
    </footer>

    <script src="<?= ROOT_URL ?>js/main.js"></script>
</body>
</html>