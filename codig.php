<html>
    <head>
        <title>Home - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div id="pag">
            <div id="conteudo"><!-- conteudo -->
                <div id="dEscala" style="display: none;">
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

                    Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                    "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

                    1914 translation by H. Rackham
                    "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"

                </div>
            
                <div id="dConsulta" style="display: none;">
                        
                    <form action="">
                            <label for="tFuncionario">Tipo: </label>

                            <input id="rfunc" type="radio" name="tFuncionario"
                                <?php if (isset($gender) && $gender=="funcionario") echo "checked";?>
                                value="1">
                            <label for="rfunc"> Funcionário</label>

                            <input id="rSup" type="radio" name="tFuncionario"
                                <?php if (isset($gender) && $gender=="other") echo "checked";?>
                                value="2">
                            <label for="rSup"> Supervisor</label>

                            <input id="rDir" type="radio" name="tFuncionario"
                                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                                value="0">
                            <label for="rDir"> Diretor</label>


                            <br>
                            <br>
                            <label for="lNome">Nome: </label>
                            <input id="dNome" name="username" type="text" placeholder="Fulano Silva">
                            
                        <br><br>
                        <input class="botaoEnviar" type="submit" name="enviar1" value="Buscar">
                    </form>
            
                </div>
                <div id="dCadastra" style="display: none;">
                    <form action="cadastra.php" method="POST">
                        <label for="tFuncionario">Tipo: </label>

                        <input id="rfunc1" type="radio" name="tFuncionario1"
                            <?php if (isset($gender) && $gender=="funcionario") echo "checked";?>
                            value="1">
                        <label for="rfunc1"> Funcionário</label>

                        <input id="rSup1" type="radio" name="tFuncionario1"
                            <?php if (isset($gender) && $gender=="other") echo "checked";?>
                            value="2">
                        <label for="rSup1"> Supervisor</label>

                        <input id="rDir1" type="radio" name="tFuncionario1"
                            <?php if (isset($gender) && $gender=="male") echo "checked";?>
                            value="0">
                        <label for="rDir1"> Diretor</label>

                        <br>
                        <br>
                        <label for="lNome">Nome: </label>
                        <input id="dNome" name="username" type="text" placeholder="Fulano Silva">
                        <br>
                        <br>
                        <label for="lNome">Setor: </label>
                        <input id="dNome" name="username" type="text" placeholder="Recepção">
                        <br>
                        <br>
                        <label for="lNome">Tipo de férias </label>
                        <input id="dNome" name="username" type="text" placeholder="Completa">
                        <br>
                        <br>
                        <label for="lNome">Tipo de expediente(h/dia): </label>
                        <input id="dNome" name="username" type="text" placeholder="4">

                        <br><br>
                        <input class="botaoEnviar" type="submit" name="enviar1" value="Cadastrar">
                    </form>
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
