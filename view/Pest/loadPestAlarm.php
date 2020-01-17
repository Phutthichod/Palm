<?php
include_once("../../dbConnect.php");
$sql = "SELECT lpa.ID,dp.ID AS 'DIMpestID',dp.dbpestTID,dp.dbpestLID,S.FID,df.dbID AS 'SFID',S.Name,S.FName,df.Name AS 'subFName',S.SumSubFarm,S.SumArea,S.SumNumTree,dp.TypeTH,dt.Date,dp.Name AS 'PName',dp.Alias AS 'PAlias',dp.Charactor,dp.Danger,dpl.Icon,lp.NumPicChar,lp.NumPicDanger,lpa.PICS,lpa.Note
FROM `log-pestalarm` AS lpa
   INNER JOIN (SELECT du.Alias AS 'Name',lf.DIMfarmID AS 'FID',df.Name AS 'FName', lf.NumSubFarm AS 'SumSubFarm',lf.AreaTotal AS 'SumArea',lf.NumTree AS 'SumNumTree' ,lf.EndID
                      FROM `log-farm` AS lf 
                         JOIN `dim-time` AS dt ON dt.ID = lf.StartID
                         JOIN `dim-farm` as df ON  df.dbID = lf.DIMfarmID 
                         JOIN `dim-user` as du ON du.ID = lf.DIMownerID
					  WHERE lf.EndID IS NULL AND lf.DIMSubFID IS NULL AND df.isFarm = 1) AS S
   ON lpa.DIMfarmID = S.FID
   JOIN `dim-pest` AS dp ON dp.ID = lpa.DIMpestID 
   JOIN `dim-time` AS dt ON dt.ID = lpa.DIMdateID
   JOIN `dim-farm` AS df ON df.ID = lpa.DIMsubFID
   JOIN `log-pest` AS lp ON lp.DIMpestID = dp.ID
   JOIN `db-pestlist` AS dpl ON dpl.PID = dp.dbpestLID
   WHERE lpa.isDelete = 0 AND dt.Year2 = YEAR(CURDATE())+543
";
$data = selectAll($sql);
echo json_encode($data);
