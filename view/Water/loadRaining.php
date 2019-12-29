<?php
include_once("../../dbConnect.php");
$sql = "SELECT T.FullName,T.Name,T.DIMfarmID,T.DIMsubFID,T.AreaTotal,T.NumTree,T.count_FSID,COUNT(lgr.DIMdateID) AS 'count_dateID',SUM(lgr.Vol) AS 'vol'
FROM `log-raining` AS lgr 
JOIN (
      SELECT T.FullName,T.Name,T.DIMfarmID,T.DIMsubFID,T.AreaTotal,T.NumTree,COUNT(T.DIMsubFID) AS 'count_FSID' FROM (
          SELECT DISTINCT dimu.FullName,dimf.Name,lgr.DIMfarmID,lgr.DIMsubFID,lgf.AreaTotal,lgf.NumTree
              FROM `log-raining` AS lgr 
              JOIN `dim-user` AS dimu ON lgr.DIMownerID = dimu.ID
              JOIN `dim-farm` AS dimf ON lgr.DIMfarmID = dimf.ID
              JOIN `db-subfarm` AS dbsf ON dimf.ID = dbsf.FMID 
              JOIN `log-farm` AS lgf ON lgr.DIMownerID = lgf.DIMownerID AND lgr.DIMfarmID = lgf.DIMfarmID AND lgr.DIMsubFID = lgf.DIMsubFID
     ) AS T
     GROUP BY T.DIMfarmID
) AS T ON lgr.DIMfarmID = T.DIMfarmID
GROUP BY T.DIMfarmID
";
$data = selectAll($sql);
echo json_encode($data);
