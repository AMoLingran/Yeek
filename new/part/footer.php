<?php
?>

<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link"><?php echo @$ua ?></a>
        </li>
        <?php if ($ua=="电脑版"): ?>
            <li>
                <a class="nav-link">|</a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="http://yeek.top">Yeek首页</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://gitee.com/Moreant/Yeek">开源</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">关于</a>
        </li>
    </ul>
    <span class="copyright ml-auto my-auto mr-2">Copyright © <?php echo date('Y') ?> <a
                href="http://www.yeek.top/" target="_blank">Moreant</a>
</footer>

