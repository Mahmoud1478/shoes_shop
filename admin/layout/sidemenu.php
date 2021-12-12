<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
    <div class="mdc-drawer__header">
        <a href="<?php echo DOC_ROOT;?>admin" class="brand-logo">
            <img src="../assets/images/logo.svg" alt="logo">
        </a>
    </div>
    <div class="mdc-drawer__content">
        <div class="user-info">
            <p class="name"> <?php echo $_SESSION['user']->fname.' '.$_SESSION['user']->lname ?></p>
            <p class="email"><?php echo $_SESSION['user']->email ?></p>
        </div>
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo DOC_ROOT;?>admin/">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                        Dashboard
                    </a>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="categories-sub-menu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                        Categories
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="categories-sub-menu">
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="<?php echo DOC_ROOT;?>admin/categories/all-categories.php">
                                    All
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="<?php echo DOC_ROOT;?>admin/categories/new-category.php">
                                    Add New
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="products-sub-menu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                        Products
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="products-sub-menu">
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="<?php echo DOC_ROOT;?>admin/products/all-products.php">
                                    All
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="<?php echo DOC_ROOT;?>admin/products/new-product.php">
                                    Add New
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="users-sub-menu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                        Users
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="users-sub-menu">
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="/shoes/admin/users/all-users.php">
                                    All
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="/shoes/admin/users/new-user.php">
                                    Add New
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
        <div class="profile-actions">
            <a href="javascript:;">Settings</a>
            <span class="divider"></span>
            <a href="<?php echo url('logout.php')?>">Logout</a>
        </div>
        <div class="mdc-card premium-card">
            <div class="d-flex align-items-center">
                <div class="mdc-card icon-card box-shadow-0">
                    <i class="mdi mdi-shield-outline"></i>
                </div>
                <div>
                    <p class="mt-0 mb-1 ml-2 font-weight-bold tx-12">Material Dash</p>
                    <p class="mt-0 mb-0 ml-2 tx-10">Pro available</p>
                </div>
            </div>
            <p class="tx-8 mt-3 mb-1">More elements. More Pages.</p>
            <p class="tx-8 mb-3">Starting from $25.</p>
            <a href="https://www.bootstrapdash.com/product/material-design-admin-template/" target="_blank">
                <span class="mdc-button mdc-button--raised mdc-button--white">Upgrade to Pro</span>
            </a>
        </div>
    </div>
</aside>