docker buildx build \
  --platform linux/amd64 \
  -f Dockerfile \
  -t yobistudio/ablegroup-geoapi-app:latest \
  . --push
