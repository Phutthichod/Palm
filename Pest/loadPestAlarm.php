<?php
include_once("../../dbConnect.php");
$sql = "SELECT lpa.ID,dpl.PID,S.Name,S.FName,S.SumSubFarm,S.SumArea,S.SumNumTree,dp.TypeTH,dt.Date,dp.Name AS 'PName',dp.Alias AS 'PAlias',dp.Charactor,dp.Danger,dpl.Icon,dpl.NumPicChar,dpl.NumPicDanger,lpa.PICS,lpa.Note
FROM `log-pestalarm` AS lpa
   INNER JOIN (SELECT du.Alias AS 'Name',lf.DIMfarmID AS 'FID',df.Name AS 'FName', lf.NumSubFarm AS 'SumSubFarm',lf.AreaTotal AS 'SumArea',lf.NumTree AS 'SumNumTree' ,lf.EndID
                      FROM `log-farm` AS lf 
                         JOIN `dim-time` AS dt ON dt.ID = lf.StartID
                         JOIN `db-farm` as df ON  df.FMID = lf.DIMfarmID 
                         JOIN `dim-user` as du ON du.ID = lf.DIMownerID
					  WHERE lf.EndID IS NULL) AS S
   ON lpa.DIMfarmID = S.FID
   JOIN `dim-pest` AS dp ON dp.ID = lpa.DIMpestID 
   JOIN `dim-time` AS dt ON dt.ID = lpa.DIMdateID
   JOIN `db-pestlist` AS dpl ON dpl.PID = dp.dbpestLID
   WHERE lpa.isDelete = 0
";
$data = selectAll($sql);
echo json_encode($data);
