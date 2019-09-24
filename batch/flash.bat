@echo off
setlocal enableDelayedExpansion

echo Flash Cleanup
echo.
pause

:a 
Title Cleanup
Color 1b

pause

echo delete file

:: Delete Trashes



attrib -a -s -h -r "e:\._.Trashes"

del "e:\._.Trashes"

:: Delete DriveBat



attrib -a -s -h -r "e:\drive.bat"

del "e:\drive.bat"



:: Del Trashes Folder



attrib -a -s -h -r "e:\.Trashes"

del "e:\.Trashes"




:: Delete autorun.inf



attrib -a -s -h -r "e:\autorun.inf"

del "e:\autorun.inf"





:: Delete thumbs.db



attrib -a -s -h -r "e:\thumbs.db"

del "e:\thumbs.db"




:: Delete desktop.ini


attrib -a -s -h -r "e:\desktop.ini"

del "e:\desktop.ini"




:: Del Funny autorun.inf

attrib -a -s -h -r "e:\._autorun.inf"

del "e:\._autorun.inf"




:: Delete DS Store

attrib -a -s -h -r "e:\.DS_Store"

del "e:\.DS_Store"


:: Delete Others

attrib -a -s -h -r "e:\._Setup.exe"

del "e:\._Setup.exe"



attrib -a -s -h -r "e:\._Connect.exe"

del "e:\._Connect.exe"



attrib -a -s -h -r "e:\._Drivers"

del "e:\._Drivers"


attrib -a -s -h -r "e:\.metadata_never_index"

del "e:\.metadata_never_index"



attrib -a -s -h -r "e:\._Settings"

del "e:\._Settings"

attrib -a -s -h -r "e:\abraxas"

del "e:\abraxas"

attrib -a -s -h -r "e:\Autocrat"

del "e:\Autocrat"

pause

format "e:" /fs:FAT32


:: Delete Trashes



attrib -a -s -h -r "e:\._.Trashes"

del "e:\._.Trashes"



:: Del Trashes Folder



attrib -a -s -h -r "e:\.Trashes"

del "e:\.Trashes"




:: Delete autorun.inf



attrib -a -s -h -r "e:\autorun.inf"

del "e:\autorun.inf"





:: Delete thumbs.db



attrib -a -s -h -r "e:\thumbs.db"

del "e:\thumbs.db"




:: Delete desktop.ini


attrib -a -s -h -r "e:\desktop.ini"

del "e:\desktop.ini"




:: Del Funny autorun.inf

attrib -a -s -h -r "e:\._autorun.inf"

del "e:\._autorun.inf"




:: Delete DS Store

attrib -a -s -h -r "e:\.DS_Store"

del "e:\.DS_Store"

pause 

:: Delete Others

attrib -a -s -h -r "f:\._Setup.exe"

del "f:\._Setup.exe"



attrib -a -s -h -r "f:\._Connect.exe"

del "f:\._Connect.exe"



attrib -a -s -h -r "f:\._Drivers"

del "f:\._Drivers"


attrib -a -s -h -r "f:\.metadata_never_index"

del "f:\.metadata_never_index"



attrib -a -s -h -r "f:\._Settings"

del "f:\._Settings"

attrib -a -s -h -r "f:\abraxas"

del "f:\abraxas"

attrib -a -s -h -r "f:\Autocrat"

del "f:\Autocrat"

pause

format "f:" /fs:FAT32
pause 

echo thank you

pause