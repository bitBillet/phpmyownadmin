<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <ul>
        <li>Categories</li>
        <ul>
            <li>
                Tables
                <ul>
                    <li><a href="/edit-tables">All tables</a></li>
                    <li><a href="/site/create">Create table</a></li>
                </ul>
            </li>
            <li>
                SQL Script
                <ul>
                    <li>
                        <a href="script/script-history">All Scripts</a>
                    </li>
                    <li>
                        <a href="/script/sql-script">Create SQL Script</a>
                    </li>
                </ul>
            </li>
        </ul>
    </ul>

</div>
