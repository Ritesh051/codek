<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codek</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon_io/favicon-16x16.png">

    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../main page/CSS/login.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="../main page/CSS/mainStyle.css?v=<?php echo time();?>">
</head>

<body>
    <header>
        <nav>
            <div class="left" style="color: white;">CODEK</div>
            <div class="right">
                <ul>
                    <li><a href="../main page/index.php">Home</a></li>
                    <li><a href="../main page/index.php">About</a></li>
                    <li><a href="../main page/index.php">Blog</a></li>
                    <li><a href="../main page/index.php">Contact Me</a></li>
                    <li><a href="../main page/login.php">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="firstSection">
            <div class="leftSection">
                Welcome to <span class="codek">CODEK</span>
                <div>Learn more about</div>
                <span id="element"></span>
            </div>
            <div class="rightSection">
                <img src="../images/new.png" alt="">
            </div>
        </section>
        <section class="secondSection">
            <div class="anotherRight">
                <img src="../images/ilustrate.png" alt="">
            </div>
            <div class="anotherLeft">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium totam.
                Similique expedita error reiciendis beatae maiores laboriosam autem, soluta, magni, iure necessitatibus
                ipsa aut voluptatum voluptas voluptatem quae ex?</div>
        </section>

        <section class="thirdSection">
            <div class="centerSection">
                <h1>BOOST YOUR KNOWLEDGE</h1>
            </div>
            <div class="cards" data-speed="fast">
                <ul class="inner_scroll">
                    <li><img src="../images/3rdSection/card1.png" alt="">
                        <span>Front-end</span>
                    </li>
                    <li><img src="../images/3rdSection/card2.png" alt="">
                        <span>Back-end</span>
                    </li>
                    <li><img src="../images/3rdSection/card3.jpg" alt="">
                        <span>Mern Stack</span>
                    </li>
                    <li><img src="../images/3rdSection/card4.jpg" alt="">
                        <span>Node.js</span>
                    </li>
                    <li><img src="../images/3rdSection/card5.jpg" alt="">
                        <span>Full-Stack</span>
                    </li>
                    <li><img src="../images/3rdSection/card6.png" alt="">
                        <span>Aamazon AWS</span>
                    </li>
                    <li><img src="../images/3rdSection/card7.png" alt="">
                        <span>Rust</span>
                    </li>
                </ul>
            </div>

            <div class="cards" data-speed="fast" data-direction="right">
                <ul class="tag-list inner_scroll">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JS</li>
                    <li>SSG</li>
                    <li>Webdev</li>
                    <li>Animation</li>
                    <li>UI/UX</li>
                    <li>Node.js</li>
                    <li>React</li>
                    <li>Angular</li>
                    <li>SQL</li>
                    <li>MongoDB</li>
                </ul>
            </div>
        </section>
        <section class="fourthSection">
            <div>
                <h1>About Us</h1>
            </div>

    </main>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed('#element', {
            strings: ['Coding.', 'New Skills.', 'Web Designing.', 'Problem Solving.', 'UI / UX.', 'Animation.', 'Graphic Designing.'],
            typeSpeed: 50,
        });
    </script>
</body>
<script src="../main page/index.js"></script>
<script src="../main page/validation.js"></script>

</html>
