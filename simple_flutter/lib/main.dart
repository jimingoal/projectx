import 'package:flutter/material.dart';
import 'package:simple_flutter/models/student.dart';

import './screens/home.dart';
import './screens/create.dart';
import './screens/details.dart';
import './screens/edit.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter + PHP CRUD',
      initialRoute: '/',
      routes: {
        '/': (context) => Home(),
        '/create': (context) => Create(),
        '/details': (context) =>
            Details(student: Student(age: 0, id: 0, name: '')), // 나중에 개선 필요
        '/edit': (context) =>
            Edit(student: Student(age: 0, id: 0, name: '')), // 나중에 개선 필요ㄴ
      },
    );
  }
}
