<div class="w-100" id="dns">
    <div class="w-100 text-center mt-5">
        <h1>Inicie su DNS</h1>
    </div>
    <form action="./src/script/php/service/setup/dns.php" method="POST" class="mt-5">
        <div class="w-100 text-center">
        <label for="dominio" class="d-block fs-3">DOMINIO</label>
        <input type="text" name="dominio" class="fs-1 p-3 mt-5 mb-5">
        <select name="extension" id="extension">
            <option value=".com">com</option>
            <option value=".cat">cat</option>
            <option value=".org">org</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">AÑADIR</button>

        </div>
        
    </form>
</div>