import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:simple_flutter/widgets/form.dart';

import '../env.sample.dart';

class Create extends StatefulWidget {
  final Function? refreshStudentList;

  Create({
    Key? key,
    this.refreshStudentList,
  }) : super(key: key);

  @override
  _CreateState createState() => _CreateState();
}

class _CreateState extends State<Create> {
  // Requreid of form valications
  final formKey = GlobalKey<FormState>();

  // Handles text onChange
  TextEditingController nameController = new TextEditingController();
  TextEditingController ageController = new TextEditingController();

  // Http post request to create new data
  Future _createStudent() async => await http.post(
        Uri.parse("${Env.URL_PREFIX}/create.php"),
        body: {
          "name": nameController.text,
          "age": ageController.text,
        },
      );

  _onConfrim(context) async {
    await _createStudent();

    // Remove all existing routs until the Home.dart, then rebuild Home.
    Navigator.of(context).pushNamedAndRemoveUntil('/', (route) => false);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Create'),
      ),
      bottomNavigationBar: BottomAppBar(
        child: ElevatedButton(
          onPressed: () =>
              formKey.currentState!.validate() ? _onConfrim(context) : null,
          child: Text("CONFIRM"),
          style: ButtonStyle(
            backgroundColor: MaterialStateProperty.all<Color>(Colors.blue),
          ),
        ),
      ),
      body: Container(
        height: double.infinity,
        padding: EdgeInsets.all(20),
        child: Center(
          child: Padding(
            padding: EdgeInsets.all(12),
            child: AppForm(
              formKey: formKey,
              nameController: nameController,
              ageController: ageController,
            ),
          ),
        ),
      ),
    );
  }
}
