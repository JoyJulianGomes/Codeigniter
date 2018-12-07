<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width:100%;
            border-collapse: collapse;
        }
        table th, td{
            border: 1px black solid;
            text-align: center;
        }
        td {
        border: 2px solid blue;
        background-color: #ffffee;
    }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th width="5%">Reg. Id</th>
            <th width="10%">Name</th>
            <th width="10%">Father's Name</th>
            <th width="10%">Mother's Name</th>
            <th width="5%">Gender</th>
            <th width="6%">Marital Status</th>
            <th width="10%">Occupation</th>
            <th width="10%">Designation</th>
            <th width="10%">Contact</th>
            <th width="4%">Spouse</th>
            <th width="4%">Child</th>
            <th width="4%">Other</th>
            <th width="6%">Amount Payable</th>
            <th width="6%">Amount Paid</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row):?>
        <tr>
            <td width="5%"><?=$row->regid?></td>
            <td width="10%"><?=$row->name?></td>
            <td width="10%"><?=$row->father?></td>
            <td width="10%"><?=$row->mother?></td>
            <td width="5%"><?=$row->gender?></td>
            <td width="6%"><?=$row->mstat?></td>
            <td width="10%"><?=$row->occupation?></td>
            <td width="10%"><?=$row->designation?></td>
            <td width="10%"><?=$row->contact?></td>
            <td width="4%"><?=$row->spouse_count?></td>
            <td width="4%"><?=$row->child_count?></td>
            <td width="4%"><?=$row->other_count?></td>
            <td width="6%"><?=$row->total_amount?></td>
            <td width="6%"><?=$row->paid_amount?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</body>
</html>