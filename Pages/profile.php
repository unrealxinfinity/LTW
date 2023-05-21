<main>
        <section id="profile" class = "padding">
            <div class = "profile_intro">
                <h1><?php echo htmlentities($_SESSION['username']); ?></h1>
                <p><?php echo htmlentities($_SESSION['role']); ?></p>

            </div>
        </section>