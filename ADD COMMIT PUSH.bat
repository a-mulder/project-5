echo off
git add .
PAUSE
set /p msg="Entel comment: "
PAUSE
git commit -m "%msg%"
PAUSE
git push
PAUSE