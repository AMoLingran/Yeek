<?php
?>
<style>
    #select_subject {
        justify-content: space-around;
        display: flex;
        margin: 1% 10%;
    }

    #select_subject form {
        float: left;
    }

    #select_subject form input {
        line-height: 50px;
        height: 60px;
        width: 150px;
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
    <form method="get">
        <input type="submit" value="SQL Server"/>
        <input type="hidden" name="subject" value="sql"/>
    </form>
    <form method="get">
        <input type="submit" value="Android"/>
        <input type="hidden" name="subject" value="android"/>
    </form>
</div>

