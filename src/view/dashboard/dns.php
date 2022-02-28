<div class="w-100" id="dns">
    <?php
        $sql = "SELECT status,nombreDominio FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =".
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'dns')";
        $result = $conn->query($sql)->fetch_assoc();
        if ($result['status'] == "no"):
            require_once './src/view/dashboard/setups/dns.php';
        else:
            
    ?>
        <h1 class="mx-5"><?=$result['nombreDominio']?></h1>
        <form class="mx-5 mt-5" action="">
            <select name="" id="" class="fs-5">
                <option value="a">A</option>
                <option value="aaaa">AAAA</option>
                <option value="mx">MX</option>
            </select>
            <input type="text" placeholder="Host" class="fs-5">
            <input type="text" placeholder="Value" class="fs-5">
            <button type="submit" class="btn btn-primary">Añadir</button>
        </form>
        <div class="p-5">
            <table class="table table-bordered">
                <thead>

                    <th scope="col">
                        <input type="checkbox" name="" id="">
                        Type
                    </th>
                    <th scope="col">Host</th>
                    <th scope="col">Value</th>
                    <th scope="col">TTL</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <th scope="col">
                        <a href="">
                            <i class="bi bi-trash"></i>
                        </a>
                    </th>
                </tbody>
            </table>
        </div>

    </div>
    <?php endif;?>