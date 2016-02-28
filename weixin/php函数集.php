<?php
#1.chdir(directory) 函数把当前的目录改变为指定的目录。若成功，则该函数返回 true，否则返回 false。

#1.chroot(directory) 函数把当前进程的根目录改变为指定的目录。若成功，则该函数返回 true，否则返回 false。

#1.dir(directory) 函数打开一个目录句柄，并返回一个对象。这个对象包含三个方法：read() , rewind() 以及 close()。若成功，则该函数返回一个目录流，否则返回 false 以及一个 error。可以通过在函数名前加上 "@" 来隐藏 error 的输出。

#1.closedir(dir_stream) 函数关闭由 opendir() 函数打开的目录句柄。

#1.opendir(path,context) 函数打开一个目录句柄，可由 closedir()，readdir() 和 rewinddir() 使用。若成功，则该函数返回一个目录流，否则返回 false 以及一个 error。可以通过在函数名前加上 "@" 来隐藏 error 的输出。

#1.readdir(dir_stream) 函数返回由 opendir() 打开的目录句柄中的条目。若成功，则该函数返回一个文件名，否则返回 false。

#1.rewinddir() 函数重置由 opendir() 打开的目录句柄。本函数什么都不会返回。

#1.scandir(directory,sort,context) 函数返回一个数组，其中包含指定路径中的文件和目录。若成功，则返回一个数组，若失败，则返回 false。如果 directory 不是目录，则返回布尔值 false 并生成一条 E_WARNING 级的错误。

#1.getcwd() 函数返回当前目录。若成功，则返回当前工作目录，否则返回 false。


#2.SimpleXMLElement($data, $options, $data_is_url, $ns, $is_prefix) 函数创建一个新的 SimpleXMLElement 对象。如果成功，则该函数返回一个对象。如果失败，则返回 false。

#2.addAttribute(name,value,ns) 函数给 SimpleXML 元素添加一个属性。

#2.addChild(name,value,ns) 函数向指定的 XML 节点添加一个子节点。

#2.asXML(file) 函数以字符串的形式从 SimpleXMLElement 对象返回 XML 文档。

#2.attributes(ns,is_prefix) 函数获取 SimpleXML 元素的属性。该函数提供在一个 XML 标签中定义的属性和值。

#2.children(ns,is_prefix) 函数获取指定节点的子节点。

#2.getDocNamespaces(recursive) 函数从 SimpleXMLElement 对象返回在 XML 文档中声明的命名空间。如果成功，该函数返回包含命名空间名称（带有关联的 URL）的数组。如果失败，则返回 false。

#2.getName() 函数从 SimpleXMLElement 对象获取 XML 元素的名称。如果成功，该函数返回当前的 XML 元素的名称。如果失败，则返回 false。

#2.getNamespace(recursive) 函数获取在 XML 文档中使用的命名空间。如果成功，该函数返回命名空间（带有关联的 URL）的一个数组。如果失败，则返回 false。

#2.registerXPathNamespace(prefix,ns) 函数为下一次 XPath 查询创建命名空间语境。

#2.simplexml_import_dom(data,class) 函数把 DOM 节点转换为 SimpleXMLElement 对象。如果失败，则该函数返回 false。
/* exp:$dom = new domDocument;
$dom->loadXML('<note><from>John</from></note>');
$xml = simplexml_import_dom($dom);
echo $xml->from; */

#2.simplexml_load_file(file,class,options,ns,is_prefix) 函数把 XML 文档载入对象中。如果失败，则返回 false。

#2.simplexml_load_string(string,class,options,ns,is_prefix) 函数把 XML 字符串载入对象中。如果失败，则返回 false。

#2.xpath() 函数运行对 XML 文档的 XPath 查询。如果成功，则返回包含 SimpleXMLElement 对象的一个数组。如果失败，则返回 false。


#.uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID。


#.json_encode( $value [, $options = 0 ])	返回JSON表示的值

#.json_decode($json [,$assoc = false [, $depth = 12 [, $options = 0 ]]])	解码为一个JSON字符串

#.json_last_error	返回上次发生错误

#.basename()	返回路径中的文件名部分。	
#.chgrp()	改变文件组。	
#.chmod()	改变文件模式。	
#.chown()	改变文件所有者。	
#.clearstatcache()	清除文件状态缓存。	
#.copy()	复制文件。	
#.delete()	参见 unlink() 或 unset()。	 
#.dirname()	返回路径中的目录名称部分。	
#.disk_free_space()	返回目录的可用空间。	
#.disk_total_space()	返回一个目录的磁盘总容量。	
#.diskfreespace()	disk_free_space() 的别名。	
#.fclose()	关闭打开的文件。	
#.feof()	测试文件指针是否到了文件结束的位置。	
#.fflush()	向打开的文件输出缓冲内容。	
#.fgetc()	从打开的文件中返回字符。	
#.fgetcsv()	从打开的文件中解析一行，校验 CSV 字段。	
#.fgets()	从打开的文件中返回一行。	
#.fgetss()	从打开的文件中读取一行并过滤掉 HTML 和 PHP 标记。	
#.file()	把文件读入一个数组中。	
#.file_exists()	检查文件或目录是否存在。	
#.file_get_contents()	将文件读入字符串。	
#.file_put_contents()	将字符串写入文件。	
#.fileatime()	返回文件的上次访问时间。	
#.filectime()	返回文件的上次改变时间。	
#.filegroup()	返回文件的组 ID。	
#.fileinode()	返回文件的 inode 编号。	
#.filemtime()	返回文件的上次修改时间。	
#.fileowner()	文件的 user ID （所有者）。	
#.fileperms()	返回文件的权限。	
#.filesize()	返回文件大小。	
#.filetype()	返回文件类型。	
#.flock()	锁定或释放文件。	
#.fnmatch()	根据指定的模式来匹配文件名或字符串。	
#.fopen()	打开一个文件或 URL。	
#.fpassthru()	从打开的文件中读数据，直到 EOF，并向输出缓冲写结果。	
#.fputcsv()	将行格式化为 CSV 并写入一个打开的文件中。	
#.fputs()	fwrite() 的别名。	
#.fread()	读取打开的文件。	
#.fscanf()	根据指定的格式对输入进行解析。	
#.fseek()	在打开的文件中定位。	
#.fstat()	返回关于一个打开的文件的信息。	
#.ftell()	返回文件指针的读/写位置	
#.ftruncate()	将文件截断到指定的长度。	
#.fwrite()	写入文件。	
#.glob()	返回一个包含匹配指定模式的文件名/目录的数组。	
#.is_dir()	判断指定的文件名是否是一个目录。	
#.is_executable()	判断文件是否可执行。	
#.is_file()	判断指定文件是否为常规的文件。	
#.is_link()	判断指定的文件是否是连接。	
#.is_readable()	判断文件是否可读。	
#.is_uploaded_file()	判断文件是否是通过 HTTP POST 上传的。	
#.is_writable()	判断文件是否可写。	
#.is_writeable()	is_writable() 的别名。	
#.link()	创建一个硬连接。	
#.linkinfo()	返回有关一个硬连接的信息。	
#.lstat()	返回关于文件或符号连接的信息。	
#.mkdir()	创建目录。	
#.move_uploaded_file()	将上传的文件移动到新位置。	
#.parse_ini_file()	解析一个配置文件。	
#.pathinfo()	返回关于文件路径的信息。	
#.pclose()	关闭有 popen() 打开的进程。	
#.popen()	打开一个进程。	
#.readfile()	读取一个文件，并输出到输出缓冲。	
#.readlink()	返回符号连接的目标。	
#.realpath()	返回绝对路径名。	
#.rename()	重名名文件或目录。	
#.rewind()	倒回文件指针的位置。	
#.rmdir()	删除空的目录。	
#.set_file_buffer()	设置已打开文件的缓冲大小。	
#.stat()	返回关于文件的信息。	
#.symlink()	创建符号连接。	
#.tempnam()	创建唯一的临时文件。	
#.tmpfile()	建立临时文件。	
#.touch()	设置文件的访问和修改时间。	
#.umask()	改变文件的文件权限。	
#.unlink()	删除文件。


#6.string getenv ( string $varname ) — 获取一个环境变量的值       返回环境变量 varname 的值， 如果环境变量 varname 不存在则返回 FALSE。
#6.bool putenv ( string $setting ) — 设置环境变量的值       添加 setting 到服务器环境变量。 环境变量仅存活于当前请求期间。 在请求结束时环境会恢复到初始状态。      成功时返回 TRUE， 或者在失败时返回 FALSE。


#7.str_pad(string,length,pad_string,pad_type) 函数把字符串填充为指定的长度。
// string	必需。规定要填充的字符串。
// length	必需。规定新字符串的长度。如果该值小于原始字符串的长度，则不进行任何操作。
// pad_string	可选。规定供填充使用的字符串。默认是空白。
// pad_type
// 可选。规定填充字符串的那边。
// 可能的值：
// STR_PAD_BOTH - 填充到字符串的两头。如果不是偶数，则右侧获得额外的填充。
// STR_PAD_LEFT - 填充到字符串的左侧。
// STR_PAD_RIGHT - 填充到字符串的右侧。这是默认的。

#8.array_key_exists(key,array) 函数判断某个数组中是否存在指定的 key，如果该 key 存在，则返回 true，否则返回 false。
#8.array()	创建数组。	
#8.array_change_key_case()	返回其键均为大写或小写的数组。	
#8.array_chunk()	把一个数组分割为新的数组块。	
#8.array_combine()	通过合并两个数组来创建一个新数组。	
#8.array_count_values()	用于统计数组中所有值出现的次数。	
#8.array_diff()	返回两个数组的差集数组。	
#8.array_diff_assoc()	比较键名和键值，并返回两个数组的差集数组。	
#8.array_diff_key()	比较键名，并返回两个数组的差集数组。	
#8.array_diff_uassoc()	通过用户提供的回调函数做索引检查来计算数组的差集。	
#8.array_diff_ukey()	用回调函数对键名比较计算数组的差集。	
#8.array_fill()	用给定的值填充数组。	
#8.array_filter()	用回调函数过滤数组中的元素。	
#8.array_flip()	交换数组中的键和值。	
#8.array_intersect()	计算数组的交集。	
#8.array_intersect_assoc()	比较键名和键值，并返回两个数组的交集数组。	
#8.array_intersect_key()	使用键名比较计算数组的交集。	
#8.array_intersect_uassoc()	带索引检查计算数组的交集，用回调函数比较索引。	
#8.array_intersect_ukey()	用回调函数比较键名来计算数组的交集。	
#8.array_key_exists()	检查给定的键名或索引是否存在于数组中。	
#8.array_keys()	返回数组中所有的键名。	
#8.array_map()	将回调函数作用到给定数组的单元上。	
#8.array_merge()	把一个或多个数组合并为一个数组。	
#8.array_merge_recursive()	递归地合并一个或多个数组。	
#8.array_multisort()	对多个数组或多维数组进行排序。	
#8.array_pad()	用值将数组填补到指定长度。	
#8.array_pop()	将数组最后一个单元弹出（出栈）。	
#8.array_product()	计算数组中所有值的乘积。	
#8.array_push()	将一个或多个单元（元素）压入数组的末尾（入栈）。	
#8.array_rand()	从数组中随机选出一个或多个元素，并返回。	
#8.array_reduce()	用回调函数迭代地将数组简化为单一的值。	
#8.array_reverse()	将原数组中的元素顺序翻转，创建新的数组并返回。	
#8.array_search()	在数组中搜索给定的值，如果成功则返回相应的键名。	
#8.array_shift()	删除数组中的第一个元素，并返回被删除元素的值。	
#8.array_slice()	在数组中根据条件取出一段值，并返回。	
#8.array_splice()	把数组中的一部分去掉并用其它值取代。	
#8.array_sum()	计算数组中所有值的和。	
#8.array_udiff()	用回调函数比较数据来计算数组的差集。	
#8.array_udiff_assoc()	带索引检查计算数组的差集，用回调函数比较数据。	
#8.array_udiff_uassoc()	带索引检查计算数组的差集，用回调函数比较数据和索引。	
#8.array_uintersect()	计算数组的交集，用回调函数比较数据。	
#8.array_uintersect_assoc()	带索引检查计算数组的交集，用回调函数比较数据。	
#8.array_uintersect_uassoc()	带索引检查计算数组的交集，用回调函数比较数据和索引。	
#8.array_unique()	删除数组中重复的值。	
#8.array_unshift()	在数组开头插入一个或多个元素。	
#8.array_values()	返回数组中所有的值。	
#8.array_walk()	对数组中的每个成员应用用户函数。	
#8.array_walk_recursive()	对数组中的每个成员递归地应用用户函数。	
#8.arsort()	对数组进行逆向排序并保持索引关系。	
#8.asort()	对数组进行排序并保持索引关系。	
#8.compact()	建立一个数组，包括变量名和它们的值。	
#8.count()	计算数组中的元素数目或对象中的属性个数。	
#8.current()	返回数组中的当前元素。	
#8.each()	返回数组中当前的键／值对并将数组指针向前移动一步。	
#8.end()	将数组的内部指针指向最后一个元素。	
#8.extract()	从数组中将变量导入到当前的符号表。	
#8.in_array()	检查数组中是否存在指定的值。	
#8.key()	从关联数组中取得键名。	
#8.krsort()	对数组按照键名逆向排序。	
#8.ksort()	对数组按照键名排序。	
#8.list()	把数组中的值赋给一些变量。	
#8.natcasesort()	用“自然排序”算法对数组进行不区分大小写字母的排序。	
#8.natsort()	用“自然排序”算法对数组排序。	
#8.next()	将数组中的内部指针向前移动一位。	
#8.pos()	array()	创建数组。	
#8.array_change_key_case()	返回其键均为大写或小写的数组。	
#8.array_chunk()	把一个数组分割为新的数组块。	
#8.array_combine()	通过合并两个数组来创建一个新数组。	
#8.array_count_values()	用于统计数组中所有值出现的次数。	
#8.array_diff()	返回两个数组的差集数组。	
#8.array_diff_assoc()	比较键名和键值，并返回两个数组的差集数组。	
#8.array_diff_key()	比较键名，并返回两个数组的差集数组。	
#8.array_diff_uassoc()	通过用户提供的回调函数做索引检查来计算数组的差集。	
#8.array_diff_ukey()	用回调函数对键名比较计算数组的差集。	
#8.array_fill()	用给定的值填充数组。	
#8.array_filter()	用回调函数过滤数组中的元素。	
#8.array_flip()	交换数组中的键和值。	
#8.array_intersect()	计算数组的交集。	
#8.array_intersect_assoc()	比较键名和键值，并返回两个数组的交集数组。	
#8.array_intersect_key()	使用键名比较计算数组的交集。	
#8.array_intersect_uassoc()	带索引检查计算数组的交集，用回调函数比较索引。	
#8.array_intersect_ukey()	用回调函数比较键名来计算数组的交集。	
#8.array_key_exists()	检查给定的键名或索引是否存在于数组中。	
#8.array_keys()	返回数组中所有的键名。	
#8.array_map()	将回调函数作用到给定数组的单元上。	
#8.array_merge()	把一个或多个数组合并为一个数组。	
#8.array_merge_recursive()	递归地合并一个或多个数组。	
#8.array_multisort()	对多个数组或多维数组进行排序。	
#8.array_pad()	用值将数组填补到指定长度。	
#8.array_pop()	将数组最后一个单元弹出（出栈）。	
#8.array_product()	计算数组中所有值的乘积。	
#8.array_push()	将一个或多个单元（元素）压入数组的末尾（入栈）。	
#8.array_rand()	从数组中随机选出一个或多个元素，并返回。	
#8.array_reduce()	用回调函数迭代地将数组简化为单一的值。	
#8.array_reverse()	将原数组中的元素顺序翻转，创建新的数组并返回。	
#8.array_search()	在数组中搜索给定的值，如果成功则返回相应的键名。	
#8.array_shift()	删除数组中的第一个元素，并返回被删除元素的值。	
#8.array_slice()	在数组中根据条件取出一段值，并返回。	
#8.array_splice()	把数组中的一部分去掉并用其它值取代。	
#8.array_sum()	计算数组中所有值的和。	
#8.array_udiff()	用回调函数比较数据来计算数组的差集。	
#8.array_udiff_assoc()	带索引检查计算数组的差集，用回调函数比较数据。	
#8.array_udiff_uassoc()	带索引检查计算数组的差集，用回调函数比较数据和索引。	
#8.array_uintersect()	计算数组的交集，用回调函数比较数据。	
#8.array_uintersect_assoc()	带索引检查计算数组的交集，用回调函数比较数据。	
#8.array_uintersect_uassoc()	带索引检查计算数组的交集，用回调函数比较数据和索引。	
#8.array_unique()	删除数组中重复的值。	
#8.array_unshift()	在数组开头插入一个或多个元素。	
#8.array_values()	返回数组中所有的值。	
#8.array_walk()	对数组中的每个成员应用用户函数。	
#8.array_walk_recursive()	对数组中的每个成员递归地应用用户函数。	
#8.arsort()	对数组进行逆向排序并保持索引关系。	
#8.asort()	对数组进行排序并保持索引关系。	
#8.compact()	建立一个数组，包括变量名和它们的值。	
#8.count()	计算数组中的元素数目或对象中的属性个数。	
#8.current()	返回数组中的当前元素。	
#8.each()	返回数组中当前的键／值对并将数组指针向前移动一步。	
#8.end()	将数组的内部指针指向最后一个元素。	
#8.extract()	从数组中将变量导入到当前的符号表。	
#8.in_array()	检查数组中是否存在指定的值。	
#8.key()	从关联数组中取得键名。	
#8.krsort()	对数组按照键名逆向排序。	
#8.ksort()	对数组按照键名排序。	
#8.list()	把数组中的值赋给一些变量。	
#8.natcasesort()	用“自然排序”算法对数组进行不区分大小写字母的排序。	
#8.natsort()	用“自然排序”算法对数组排序。	
#8.next()	将数组中的内部指针向前移动一位。	
#8.pos()	current() 的别名。	
#8.prev()	将数组的内部指针倒回一位。	
#8.range()	建立一个包含指定范围的元素的数组。	
#8.reset()	将数组的内部指针指向第一个元素。	
#8.rsort()	对数组逆向排序。	
#8.shuffle()	把数组中的元素按随机顺序重新排列。	
#8.sizeof()	count() 的别名。	
#8.sort()	对数组排序。	
#8.uasort()	使用用户自定义的比较函数对数组中的值进行排序并保持索引关联。	
#8.uksort()	使用用户自定义的比较函数对数组中的键名进行排序。	
#8.usort()	使用用户自定义的比较函数对数组中的值进行排序。current() 的别名。	
#8.prev()	将数组的内部指针倒回一位。	
#8.range()	建立一个包含指定范围的元素的数组。	
#8.reset()	将数组的内部指针指向第一个元素。	
#8.rsort()	对数组逆向排序。	
#8.shuffle()	把数组中的元素按随机顺序重新排列。	
#8.sizeof()	count() 的别名。	
#8.sort()	对数组排序。	
#8.uasort()	使用用户自定义的比较函数对数组中的值进行排序并保持索引关联。	
#8.uksort()	使用用户自定义的比较函数对数组中的键名进行排序。	
#8.usort()	使用用户自定义的比较函数对数组中的值进行排序。

#9.string base_convert ( string $number , int $frombase , int $tobase ) -- 在任意进制之间转换数字 







