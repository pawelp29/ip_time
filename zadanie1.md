# Building the image
```docker image build --tag ip_time .```

# Running the container
```docker run -d -p 8080:80 --name ip_time_server ip_time```

# Get info from log file
```docker exec ip_time_server /bin/cat /var/www/logs/start.log```

# Chceck the number of image layers
```docker image inspect ip_time:latest | jq '[.[0]."RootFS"]'```
