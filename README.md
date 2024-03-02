### How to use
1. Install docker and docker compose
2. Docker build ```docker compose build```
3. Docker up ```docker compose up```
4. Copy or move asm file (Pong.asm) to current folder.
5. Connect to container ```docker exec -it ass-php bash```
6. Run command ```php asm.php Pong.asm Pong.hack```


### Installation Docker and docker-compose
1. https://docs.docker.com/engine/install/
2. https://docs.docker.com/compose/install/
3. Add user to docker group `sudo usermod -aG docker your-user`
4. Relogin for update user group `su - your-user`

### Build docker compose
```
docker compose build
```

### Up docker compose
```
docker compose up
```

### How to connect to container?
```
docker exec -it ass-php bash
```

When you connect to container you will be in /var/www/html directory.
Execute ```ls -l``` to check if your .asm file is there.
