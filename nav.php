<body>
<div class="Header">
    <div class="Header-item">
        <a href="index.php" class="Header-link f4 d-flex flex-items-center">
            <!-- <%= octicon "mark-github", class: "mr-2", height: 32 %> -->
            <svg class="octicon octicon-mark-github mr-2" viewBox="0 0 24 24" width="32" height="32">
                <path
                    d="M12.75 2.75V4.5h1.975c.351 0 .694.106.984.303l1.697 1.154c.041.028.09.043.14.043h4.102a.75.75 0 0 1 0 1.5H20.07l3.366 7.68a.749.749 0 0 1-.23.896c-.1.074-.203.143-.31.206a6.296 6.296 0 0 1-.79.399 7.349 7.349 0 0 1-2.856.569 7.343 7.343 0 0 1-2.855-.568 6.205 6.205 0 0 1-.79-.4 3.205 3.205 0 0 1-.307-.202l-.005-.004a.749.749 0 0 1-.23-.896l3.368-7.68h-.886c-.351 0-.694-.106-.984-.303l-1.697-1.154a.246.246 0 0 0-.14-.043H12.75v14.5h4.487a.75.75 0 0 1 0 1.5H6.763a.75.75 0 0 1 0-1.5h4.487V6H9.275a.249.249 0 0 0-.14.043L7.439 7.197c-.29.197-.633.303-.984.303h-.886l3.368 7.68a.75.75 0 0 1-.209.878c-.08.065-.16.126-.31.223a6.077 6.077 0 0 1-.792.433 6.924 6.924 0 0 1-2.876.62 6.913 6.913 0 0 1-2.876-.62 6.077 6.077 0 0 1-.792-.433 3.483 3.483 0 0 1-.309-.221.762.762 0 0 1-.21-.88L3.93 7.5H2.353a.75.75 0 0 1 0-1.5h4.102c.05 0 .099-.015.141-.043l1.695-1.154c.29-.198.634-.303.985-.303h1.974V2.75a.75.75 0 0 1 1.5 0ZM2.193 15.198a5.414 5.414 0 0 0 2.557.635 5.414 5.414 0 0 0 2.557-.635L4.75 9.368Zm14.51-.024c.082.04.174.083.275.126.53.223 1.305.45 2.272.45a5.847 5.847 0 0 0 2.547-.576L19.25 9.367Z">
                </path>
            </svg>
            <span>The Law</span>
        </a>
    </div>
    <div class="Header-item Header-item--full">
        Menu
    </div>
    <div class="Header-item">
        <a href="write.php" class="Header-link">Ecrire un cours</a>
    </div>

    <div class="Header-item">
        <input type="search" class="form-control Header-input" />
    </div>

    <div class="Header-item mr-0">
        <div class="d-flex flex-justify-end position-relative">
            <details class="details-reset details-overlay">
                <summary class="Header-Link " aria-haspopup="true">
                    <svg class="octicon octicon-mark-github mr-2" viewBox="0 0 24 24" width="24" height="24">
                        <path
                            d="M12 2.5a5.25 5.25 0 0 0-2.519 9.857 9.005 9.005 0 0 0-6.477 8.37.75.75 0 0 0 .727.773H20.27a.75.75 0 0 0 .727-.772 9.005 9.005 0 0 0-6.477-8.37A5.25 5.25 0 0 0 12 2.5Z">
                        </path>
                    </svg>
                </summary>
                <div class="SelectMenu right-0">
                    <div class="SelectMenu-modal">
                        <header class="SelectMenu-header">
                            <?php
                            if (isset($_SESSION['id'])) {
                                echo "<h3 class='SelectMenu-title color-fg-default mb-1'>".$_SESSION['name']."</h3>";
                            } else {
                                echo "<h3 class='SelectMenu-title color-fg-default mb-1'>Profile</h3>";
                            }
                            ?>                            
                            <button class="SelectMenu-closeButton" type="button">
                                <!-- <%= octicon "x" %> -->
                                <svg class="octicon octicon-x" viewBox="0 0 16 16"
                                    width="16" height="16">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z">
                                    </path>
                                </svg>
                            </button>
                        </header>
                        <div class="SelectMenu-list">
                            <a class="SelectMenu-item" role="menuitem" href="profile.php">Profile</a>
                            <a class="SelectMenu-item" role="menuitem" href="login.php">Se connecter</a>
                        </div>
                    </div>
                </div>
            </details>
        </div>
    </div>
</div>