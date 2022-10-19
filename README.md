# Rest API with PHP

- Method: POST
- url: .../state.php
- Database: MariaDB, MySQL
- utf8mb4

structure of database:
```
CREATE TABLE `en_ex` (
  `id` int(11) NOT NULL,
  `date` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `time` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `type` int(11) NOT NULL,
  `student_id` int(20) NOT NULL,
  `device_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `en_ex`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `en_ex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
```
This API will insert following data in data-base table. post yuor data to **".../state.php"** as bellow:

```
-----student_id //Recorded id of student in device
-----device_id //id of device
-----time //Recorded time H:i
-----date //Recorded Jalali-date YYYY/mm/dd
-----type //type of trafic. 0 => exite , 1 => enter

```
Examaple code to post data:
```
# importing the requests library
import requests

# defining the api-endpoint
API_ENDPOINT = "*****"

# your API key here

# your source code here
student_id=121
device_id=8
time="888"
date="128"
t=8

# data to be sent to api
data = {'student_id':student_id,
        'device_id':device_id,
        'time':time,
        'date':date,
        'type':t  }

# sending post request and saving response as response object
r = requests.post(url = API_ENDPOINT, data = data)

# extracting response text
pastebin_url = r.text
print("The pastebin URL is:%s"%pastebin_url)
```
