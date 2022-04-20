<div class="header_search_bot">
    <form action="./search.php" method="POST">
        <input type="text" name="searchpro" placeholder="  Tìm kiếm sản phẩm" require>
        <button type="submit" name="search">Tìm kiếm</button>
    </form>

    <?php
    if (isset($_SESSION['admin'])) { ?>
        <nav id="navbar1">
            <ul id="main-menu">
                <li>
                    <a href="#"><?= $_SESSION['admin']['name'] ?></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="./user/profile.php?id=<?php echo $_SESSION['admin']['id'] ?>">Thông tin</a>
                        </li>
                        <li>
                            <?php
                            if (isset($_SESSION['admin'])) { ?>
                                <a href="../admin/index.php">Quản trị</a>
                            <?php

                            } ?>
                        </li>
                        <li>
                            <a href="./user/logout.php?id=<?php echo $_SESSION['admin']['id'] ?>" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    <?php
    } elseif (isset($_SESSION['khach_hang'])) { ?>
        <nav id="navbar1">
            <ul id="main-menu">
                <li>
                    <a href="#"><?= $_SESSION['khach_hang']['name'] ?></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="./user/profile.php?id=<?php echo $_SESSION['khach_hang']['id'] ?>">Thông tin</a>
                        </li>
                        <li>
                            <a href="./user/logout.php?id=<?php echo $_SESSION['khach_hang']['id'] ?>" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    <?php
    } else { ?>
        <nav id="navbar1">
            <ul id="main-menu">
                <li>
                    <a href="./log_in.php">Đăng nhập</a>
                    <ul class="sub-menu">
                        <li><a href="./form/register.php">Đăng Kí</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    <?php
    }
    ?>
</div>