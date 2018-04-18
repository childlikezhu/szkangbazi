#!/bin/bash

cd /data/www/kangbazi/szkangbazi
git checkout my

git add .
git commit -a -m 'init'
git checkout develop
git merge my
git push origin develop

git checkout my 
echo '提交成功'
=======
git checkout my
echo '提交成功';

>>>>>>> my
