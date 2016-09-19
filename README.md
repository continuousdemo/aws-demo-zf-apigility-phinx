# aws-demo-zf-apigility-phinx

This demo use ZF Apiligity with Phinx Database migration and deployed with AWS CodeDeploy.

## Tutorial

Visit our Tutorial [Deploy with AWS - Part 1 : CodeDeploy](https://continuousphp.com/tutorial/deploy-with-aws-part-1-codedeploy/) to create the AWS infrastructure, configure continuousphp and AWS CodeDeploy to create your development pipeline.

## Configure for local development:

create a build.local.properties file with:

```bash
dir.vendor=./vendor
phinx.bin=${dir.vendor}/bin/phinx

db.host=127.0.0.1
db.port=3306
db.name=skeleton
db.username=root
db.password=
```
