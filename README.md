# aws-demo-zf-apigility-phinx

This demo use ZF Apiligity with Phinx Database migration and deployed with AWS CodeDeploy.

## Configure for local development:

create a build.local.properties file with:

```bash
dir.vendor=./vendor
phinx.bin=${dir.vendor}/bin/phinx

db.host=127.0.0.1
db.port=3306
db.dbname=skeleton
db.username=root
db.password=
```
