<?php
    include 'partials/header.php';
?>

    <section class="empty__page">
        
        <h2>Contacts Us</h2>
        <form action="https://formspree.io/f/myyqyorz" method="POST">
            <input type="text" name="Name" placeholder="Full Name" required>
            <input type="email" name="Email" placeholder="Email" required>
            <textarea name="Message" placeholder="Message..." cols="30" rows="10"></textarea>
            <button type="submit" class="btn">Send</button>
        </form>
    </section>

    <!--Footer-->
    <?php
    include 'partials/footer.php';
?>