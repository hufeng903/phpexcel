#include <string.h>
#include <stdio.h>
#include <windows.h>
int main(void){
    while(1){
        char DiskName[256]="H:\\";
        UINT DiskType;
        unsigned char i = 0x42;
        //遍历盘符
        for(; i < 0x5B; i += 0x1){
            DiskName[0] = i;
            //判断是否是可移动存储设备
            DiskType = GetDriveType(DiskName);
            if(DiskType == DRIVE_REMOVABLE){
                // 修改复制到地址，注意转义字符
                // char cmdstr[200] = {"cmd.exe /c xcopy H: d:\\udiskcopy\\ /e /y /q /h"};
                // cmdstr[17] = i;
                // system(cmdstr);
				DWORDsLen=GetLogicalDriveStrings(MAX_PATH,cBuff);
				//获取系统逻辑盘的信息
				if(0==sLen||sLen>MAX_PATH){ 
				   MessageBox("获取逻辑盘名字失败");
				   }
				char *pc=cBuff;
				int i=0;
				int iLength=0;
				while('\0'!=*pc)
				{ 
			      m_DriveList.InsertItem(i,pc,i);//插入盘符名称
			      UINTuDrivetype=GetDriveType(pc);//获取盘符类型
				  printf("%s","UINTuDrivetype");
            }
        }
        Sleep(60000);  //一分钟检测一次U盘
    }
}