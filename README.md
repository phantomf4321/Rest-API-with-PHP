# Rest-API-with-PHP

- Method: POST
- url: .../state.php

structure of database:
```
CREATE TABLE `en_ex` (
  `id` int(11) NOT NULL, --id of tabble
  `date` varchar(50) CHARACTER SET utf8mb4 NOT NULL,--Recorded date YYYY/MM/DD
  `time` varchar(50) CHARACTER SET utf8mb4 NOT NULL,--Recorded time H:i:s
  `type` int(11) NOT NULL,--type of trafic. 0 => exite , 1 => enter
  `student_id` int(20) NOT NULL,--Recorded id of student in device
  `device_id` int(20) NOT NULL--Recorded id of device
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `en_ex`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `en_ex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
```
This API will insert following data in data-base table. post yuor data to **".../state.php** as bellow:
