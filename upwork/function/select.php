<style>
    #select_subject {
        margin: 10px 20%;
        font-size: 120%;
    }
    
    #select_subject p{
        margin-top: 3%;
    }

    #select_subject form {
        margin-right:10%;
    }

    #select_subject form input {
        margin: 3%  3%  3% 0 ;
        float: left;
        line-height: 50px;
        height: 60px;
        width: 150px;
        font-size: 100%;
        border: 1px solid rgba(255, 255, 255, 0);
        background: #ff5a88;
        color: white;
        border-radius: 10px;
    }

    #select_subject form input:hover {
        text-decoration: none;
        animation: two 0.35s ease-in-out forwards;
        animation-timing-function: ease;
    }

    @keyframes two {
        0% {

        }
        100% {
            box-shadow: 2px 3px 8px #6b6b6b;
        }
    }

</style>

<div id="select_subject">
    <p>选择科目：</p>
    <form method="post">
        <input type="submit" value="SQL Server"/>
        <input type="hidden" name="workId" value="1"/>
    </form>
    <form method="post">
        <input type="submit" value="Android"/>
        <input type="hidden" name="workId" value="5"/>
    </form>
</div>
<br>