<style>
    .tabParent {
        display: flex;
    }

    .tab {
        flex-direction: row;
        justify-content: space-between;
        text-align: center;
        width: 25%;
        border: 2px soild #000000;
    }

    .tab:hover {
        flex-direction: row;
        justify-content: space-between;
        text-align: center;
        width: 25%;
        border: 2px soild #000000;
        background-color: red;

    }

    .tabSelected {
        background-color: orangered;
        text-align: center;
        width: 25%;
    }
</style>

<div class="tabParent">
    <div class="tab" id="addMember">
        <p>Add Member</p>
    </div>
    <div class="tab" id="viewmember">
        <p>View Member</p>
    </div>
    <div class="tab" id="searchMember">
        <p>Search Member</p>
    </div>
    <div class="tab" id="reports">
        <p>Reports</p>
    </div>
</div>

<script>
    document.getElementById("addMember").addEventListener('click', function() {
        window.location.href = "/dinu/AddMember.php"
    });
    document.getElementById("viewmember").addEventListener("click", function() {
        window.location.href = "/dinu/viewMember.php"
    });
    document.getElementById("searchMember").addEventListener('click', function() {
        window.location.href = "/dinu/searchMember.php"

    });
    document.getElementById("reports").addEventListener('click', function() {
        window.location.href = "/dinu/memberReport.php"

    });
</script>



</html>