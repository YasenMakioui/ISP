<div class="w-100 d-flex" style="height: 100vh !important;">
    <div class="<?= $noSidebar ?>" style="height: 100vh !important;">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh !important;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">

                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">

                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">

                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">

                        Customers
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-100 bg-danger d-flex d-none">
        1
    </div>
    <div class="w-100 bg-danger d-flex d-none">
        2
    </div>
    <div class="w-100">
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
</div>