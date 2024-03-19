<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>hopo-みんなの声を届けるアプリ-</title>
        <link rel="stylesheet" href="home.css">
    </head>

    <body>

        <div class="wrapper">
            <header>
                hopo
            </header> 
            
            <div class="container">

                <div class="side">

                    <a href="home.html">
                        教室
                    </a>
                    <br>
                
                    <a href="意見書く.html">
                        意見を書く
                    </a>
                    <br>
                    <a href="みんなの声.html">
                        みんなの声
                    </a>
        
                </div>

                <div class="main">
                    
                    <form action="完了.html" method="post">

                            名前<br>
                            <?php echo $_POST["name"]; ?>
                            意見<br>
                            <textarea name="message" value="<?php echo $_POST['opinion']; ?>"disabled></textarea><br>
                            詳しい説明<br>
                            <textarea name="text" value="<?php echo $_POST['reazon']; ?>"disabled></textarea><br>
                            <input type="submit" value="送信"/>

                            


                    </form>

                </div>

            </div>

            <footer>
                目次　hopoについて
            </footer>
        </div>
       
    </body>

</html>