# Elasticsearch workshop
From simple match to mastery

This workshop is intended to get you up and spinning with the more advanced topics of Elasticsearch besides a simple match query.

This workshop uses:
- Elasticsearch 6
- Kibana 6
- Docker

## Docker

Start the workshop by running the command in the root of this project.

```bash
docker-compose up
```

When everything is up and running, you can access the workshop
on your [localhost](http://localhost).

Elasticsearch is available on [localhost:9200](http://localhost:9200).

Kibana is available on [localhost:5601](http://localhost:9200).

You may need to replace localhost with your own domain if your Docker
configuration runs on another location.

## Composer

After docker has been fired up, you can run the composer install.

Connect to the docker container using the command

```bash
docker exec -it php71 bash
```

When in the container run the following command

```bash
composer install
```

this will install all the required PHP packages needed to run this workshop.
