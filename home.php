<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
?>

<html>
    <head>
        <title>Home - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div id="pag">
            <div id="menu"><!-- menu esquerdo -->
                <ul>
                    <li id="lEscala" onclick="animaMenu('dEscala')">Escala Atual</li>
                    <li id="lConsulta" onclick="animaMenu('dConsulta')">Consulta Funcionario</li>
                    <li id="lCadastra" onclick="animaMenu('dCadastra')">Cadastra Funcionario</li>
                    <li id="lHistorico" onclick="animaMenu('dHistorico')">Historico Escalas</li>
                </ul>
            </div>
            <div id="conteudo"><!-- conteudo -->
                <div id="dEscala" style="display: none;">
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

                    Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                    "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

                    1914 translation by H. Rackham
                    "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"

                </div>
            
                <div id="dConsulta" style="display: none;">
                        
                    Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                    "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."

                    1914 translation by H. Rackham
                    "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
            
                </div>
                <div id="dCadastra" style="display: none;">
                    Donec malesuada consectetur ipsum non sollicitudin. Proin faucibus odio at dui sollicitudin tincidunt. Integer id condimentum felis. Morbi cursus sapien non enim faucibus interdum. Praesent vel sem velit. Mauris in tellus eu risus condimentum vehicula. Mauris quis urna in elit dapibus feugiat a non sapien. Morbi et lectus vulputate, tincidunt nulla ut, convallis tortor. Proin felis nunc, tempor at odio nec, dignissim pulvinar magna. Donec quis est quam. Duis euismod nulla eu risus convallis, at porta sapien imperdiet. Integer iaculis augue velit, in interdum nunc gravida id. Aenean nec nibh odio. Morbi maximus blandit aliquet. Cras rhoncus turpis eget bibendum scelerisque. Donec vel gravida arcu.

                    Vestibulum sit amet dignissim sapien. Pellentesque eget pretium neque. In sit amet tincidunt purus. Nam aliquet nisi quis dolor porta, in fringilla quam elementum. Nullam laoreet quis tellus a semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum ligula quis sem sodales, a tempor justo imperdiet. Vivamus ac vestibulum ipsum, non placerat turpis. Sed porta elementum pretium. Aenean id metus fringilla, dictum nulla non, hendrerit libero. Duis pellentesque nibh at lectus sagittis consectetur at a erat. Fusce dapibus, erat sit amet rutrum euismod, velit leo laoreet risus, id vulputate justo massa et est. Curabitur lorem turpis, malesuada et quam ac, sodales vestibulum ante. Mauris nulla elit, interdum vel arcu et, tincidunt malesuada elit.
                </div>

                <div id="dHistorico" style="display: none;">    
                    Quisque et quam augue. Donec eros lacus, ultrices ut enim in, mattis tempus ipsum. Sed ut ipsum rhoncus, aliquam risus eu, tempus justo. Ut semper massa fermentum lacus venenatis suscipit. Suspendisse ac ipsum dolor. Nunc euismod urna et cursus tempor. Cras mattis ac turpis non eleifend. Nulla fermentum erat vel tellus ultricies rutrum. Nam a massa ac sapien volutpat sodales. Mauris tempor nec felis a tincidunt. Pellentesque finibus lectus vel purus vehicula, et euismod orci tincidunt. Suspendisse pharetra et ipsum et auctor.

                    Integer risus libero, aliquet nec gravida ac, tristique id erat. Praesent pellentesque id enim ultricies vulputate. Etiam eleifend, dolor eu pulvinar fermentum, urna sapien suscipit orci, at viverra sapien dolor sed diam. Donec porta egestas ligula, ac pellentesque ex volutpat sed. Praesent lacinia malesuada ipsum ut gravida. Nam ligula leo, iaculis sit amet massa tempus, accumsan lobortis erat. Suspendisse placerat arcu sollicitudin ipsum consectetur mollis. Pellentesque sed ullamcorper ex. Nulla sit amet condimentum ante, ac varius odio. Integer nec enim accumsan, ornare est nec, tempus erat. Nam tempus, ante id pharetra elementum, diam nisi ultricies massa, in pellentesque felis ex ut erat. Fusce et luctus justo, eu tristique felis. Mauris venenatis velit ut felis malesuada, quis mollis leo euismod.
                </div>

            </div>
            <span class="clear"></span>
        </div>
    </body>
</html>

<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");
?>