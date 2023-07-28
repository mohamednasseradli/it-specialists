<div
    class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-right"
    style="width: 200px; right: 0"
    id="mySidebar"
>
    <button
    class="w3-bar-item w3-button w3-large w3-hide-large p-0 text-light close-btn"
    onclick="w3_close()"
    >
    <i class="fa-solid fa-xmark fs-3 px-4 py-3 sidebar-close"></i>
    </button>
    <div class="text-start ps-2 fs-4 logo">IT Specialist</div>
    <div class="position-absolute w-100 links">
    <a href="admin-dashboard.php" class="w3-bar-item w3-button text-end active"
        ><i class="fa-solid fa-users"></i> Technician </a
    >

    <button
        onclick="myFunction('Demo1')"
        class="w3-button w3-block w3-right-align requests-btn"
    >
        <i class="fa-solid fa-user-plus"></i> Requests
    </button>

    <div id="Demo1" class="w3-hide">
        <a
        class="w3-button w3-block w3-right-align text-warning"
        href="requests.php?status=doing"
        >Workig in progress</a
        >
        <a
        class="w3-button w3-block w3-right-align text-success"
        href="requests.php?status=solved"
        >Solved</a
        >
        <a
        class="w3-button w3-block w3-right-align text-danger"
        href="requests.php?status=unsolved"
        >Not sloved</a
        >
    </div>

    <a href="../logout.php" class="w3-bar-item w3-button text-end"
        ><i class="fa-solid fa-arrow-right-from-bracket"></i>Sign Out</a
    >
    </div>
</div>