# importing the requests library
import requests

# defining the api-endpoint
API_ENDPOINT = "https://betavers.ir/API/vnd1/state.php"

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
