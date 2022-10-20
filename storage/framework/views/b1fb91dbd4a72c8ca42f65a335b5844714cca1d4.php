<style>
    table.dataTable.dtr-inline.collapsed>tbody>tr>td.child,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th.child,
    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty {
        cursor: default !important
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr>td.child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th.child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty:before {
        display: none !important
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control {
        position: relative;
        padding-left: 30px;
        cursor: pointer
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
        top: 50%;
        left: 5px;
        height: 1em;
        width: 1em;
        margin-top: -9px;
        display: block;
        position: absolute;
        color: white;
        border: .15em solid white;
        border-radius: 1em;
        box-shadow: 0 0 .2em #444;
        box-sizing: content-box;
        text-align: center;
        text-indent: 0 !important;
        font-family: "Courier New", Courier, monospace;
        line-height: 1em;
        content: "+";

        /* background-color: #337ab7 */
        font-family: 'Font Awesome 5 Free';
        content: '\f055';
        vertical-align: middle;
        font-weight: 900;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td.dtr-control:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th.dtr-control:before {
        content: "-";
        background-color: #d33333
    }

    table.dataTable.dtr-inline.collapsed.compact>tbody>tr>td.dtr-control,
    table.dataTable.dtr-inline.collapsed.compact>tbody>tr>th.dtr-control {
        padding-left: 27px
    }

    table.dataTable.dtr-inline.collapsed.compact>tbody>tr>td.dtr-control:before,
    table.dataTable.dtr-inline.collapsed.compact>tbody>tr>th.dtr-control:before {
        left: 4px;
        height: 14px;
        width: 14px;
        border-radius: 14px;
        line-height: 14px;
        text-indent: 3px
    }

    table.dataTable.dtr-column>tbody>tr>td.dtr-control,
    table.dataTable.dtr-column>tbody>tr>th.dtr-control,
    table.dataTable.dtr-column>tbody>tr>td.control,
    table.dataTable.dtr-column>tbody>tr>th.control {
        position: relative;
        cursor: pointer
    }

    table.dataTable.dtr-column>tbody>tr>td.dtr-control:before,
    table.dataTable.dtr-column>tbody>tr>th.dtr-control:before,
    table.dataTable.dtr-column>tbody>tr>td.control:before,
    table.dataTable.dtr-column>tbody>tr>th.control:before {
        top: 50%;
        left: 50%;
        height: .8em;
        width: .8em;
        margin-top: -0.5em;
        margin-left: -0.5em;
        display: block;
        position: absolute;
        color: white;
        border: .15em solid white;
        border-radius: 1em;
        box-shadow: 0 0 .2em #444;
        box-sizing: content-box;
        text-align: center;
        text-indent: 0 !important;
        font-family: "Courier New", Courier, monospace;
        line-height: 1em;
        content: "+";
        background-color: #337ab7
    }

    table.dataTable.dtr-column>tbody>tr.parent td.dtr-control:before,
    table.dataTable.dtr-column>tbody>tr.parent th.dtr-control:before,
    table.dataTable.dtr-column>tbody>tr.parent td.control:before,
    table.dataTable.dtr-column>tbody>tr.parent th.control:before {
        content: "-";
        background-color: #d33333
    }

    table.dataTable>tbody>tr.child {
        padding: .5em 1em
    }

    table.dataTable>tbody>tr.child:hover {
        background: transparent !important
    }

    table.dataTable>tbody>tr.child ul.dtr-details {
        display: inline-block;
        list-style-type: none;
        margin: 0;
        padding: 0
    }

    table.dataTable>tbody>tr.child ul.dtr-details>li {
        border-bottom: 1px solid #efefef;
        padding: .5em 0
    }

    table.dataTable>tbody>tr.child ul.dtr-details>li:first-child {
        padding-top: 0
    }

    table.dataTable>tbody>tr.child ul.dtr-details>li:last-child {
        border-bottom: none
    }

    table.dataTable>tbody>tr.child span.dtr-title {
        display: inline-block;
        min-width: 75px;
        font-weight: bold
    }

    div.dtr-modal {
        position: fixed;
        box-sizing: border-box;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 100;
        padding: 10em 1em
    }

    div.dtr-modal div.dtr-modal-display {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 50%;
        height: 50%;
        overflow: auto;
        margin: auto;
        z-index: 102;
        overflow: auto;
        background-color: #f5f5f7;
        border: 1px solid black;
        border-radius: .5em;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6)
    }

    div.dtr-modal div.dtr-modal-content {
        position: relative;
        padding: 1em
    }

    div.dtr-modal div.dtr-modal-close {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 22px;
        height: 22px;
        border: 1px solid #eaeaea;
        background-color: #f9f9f9;
        text-align: center;
        border-radius: 3px;
        cursor: pointer;
        z-index: 12
    }

    div.dtr-modal div.dtr-modal-close:hover {
        background-color: #eaeaea
    }

    div.dtr-modal div.dtr-modal-background {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 101;
        background: rgba(0, 0, 0, 0.6)
    }

    @media screen and (max-width: 767px) {
        div.dtr-modal div.dtr-modal-display {
            width: 95%
        }
    }

    div.dtr-bs-modal table.table tr:first-child td {
        border-top: none
    }
</style>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/datable_responsive.blade.php ENDPATH**/ ?>